<ul class="nav justify-content-center">
    <?php
        $urls = array(
            'Home' => 'index.php',
            'Kapcsolat' => 'kapcsolat.php',
            'Virtuális séta' => "seta.php"
        );
    
        foreach ($urls as $name => $url){
            print '<li class="nav-item">'.'<a class="nav-link '.(($currentPage === $name) ? 'active' : '').'" href="'.$url.'">'.$name.'</a></li>';
                
        }
    
    
    ?>
</ul>