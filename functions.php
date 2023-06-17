<?php
include 'config.php';

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif  ORDER BY kode_alternatif");
foreach($rows as $row){
    $ALTERNATIF[$row->kode_alternatif] = $row->nama_alternatif;
}

$rows = $db->get_results("SELECT kode_kriteria, nama_kriteria, bobot FROM tb_kriteria  ORDER BY kode_kriteria");
foreach($rows as $row){
    $KRITERIA[$row->kode_kriteria] = array(
        'nama_kriteria'=>$row->nama_kriteria,
        'bobot'=>$row->bobot
    );
}
function get_kriteria_option($selected = 0){
    global $KRITERIA;  
    print_r($KRITERIA);
    foreach($KRITERIA as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value[nama_kriteria]</option>";
        else
            $a.="<option value='$key'>$value[nama_kriteria]</option>";
    }
    return $a;
}
function get_data()
{
    global $db;

    $rows = $db->get_results("SELECT a.kode_alternatif, k.kode_kriteria, c.nilai
        FROM tb_alternatif a 
            INNER JOIN tb_rel_alternatif ra ON ra.kode_alternatif=a.kode_alternatif
            INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria
            LEFT JOIN tb_crips c ON ra.kode_crips=c.kode_crips
            ORDER BY a.kode_alternatif, k.kode_kriteria");
    $data = array();
    foreach ($rows as $row) {
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
    }
    return $data;
}
function get_data_2()
{
    global $db;

    $rows = $db->get_results("SELECT a.kode_alternatif, k.kode_kriteria, c.keterangan
        FROM tb_alternatif a 
            INNER JOIN tb_rel_alternatif ra ON ra.kode_alternatif=a.kode_alternatif
            INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria
            INNER JOIN tb_crips c ON ra.kode_crips=c.kode_crips
            ORDER BY a.kode_alternatif, k.kode_kriteria");
    $data = array();
    foreach ($rows as $row) {
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->keterangan;
    }
    return $data;
}
function get_minmax($data)
{
    $arr = array();
    $arr2 = array();
    foreach ($data as $key => $val) {
        foreach ($val as $k => $v) {
            $arr[$k][$key] = $v;
        }
    }
    foreach ($arr as $key => $val) {
        $arr2['max'][$key] = max($val);
        $arr2['min'][$key] = min($val);
    }
    return $arr2;
}
function nilai_utility($data)
{
    $hasil = array();
    $minmax = get_minmax($data);
    foreach ($data as $key => $value) {
        foreach ($value as $k => $v) {
            $hasil[$key][$k] = ($v-$minmax['min'][$k])/($minmax['max'][$k]-$minmax['min'][$k]);
        }
    }
    return $hasil;
}

function terbobot($data)
{
    global $KRITERIA;

    $hasil = array();
    foreach ($data as $key => $value) {
        foreach ($value as $k => $v) {
            $hasil[$key][$k] = $v * $KRITERIA[$k]['bobot'];
        }
    }
    return $hasil;
}

function hasil_akhir($data){
    global $db;

    $hasil = array();
    foreach ($data as $key => $value) {
          $hasil[$key] = array_sum($value);
      } 

    return $hasil;
}




function get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}



