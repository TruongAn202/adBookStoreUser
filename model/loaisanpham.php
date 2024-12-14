<?php
    function get_loaisach(){
        $sql="SELECT * FROM loaisach ORDER BY tenLoai"; 
        return get_all($sql);
    }
    function get_tacgia() {
        $sql="SELECT * FROM tacgia ORDER BY tenTG"; 
        return get_all($sql);
    }
?>