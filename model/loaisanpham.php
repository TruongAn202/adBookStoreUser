<?php
    function get_loaisach(){
        $sql="SELECT * FROM loaisach ORDER BY tenLoai"; 
        return get_all($sql);
    }
?>