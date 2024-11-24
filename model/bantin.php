<?php
    function getnewbantin(){
        $sql="SELECT * FROM tintuc ORDER BY maTin DESC"; //sp mới nhập vào lên trước, giảm dần theo id
        return get_all($sql);
    }
?>