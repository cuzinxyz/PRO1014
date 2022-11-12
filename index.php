<?php

if (isset($_GET['view'])) :
    require 'views/front/blog-detail.html';
else :
    require 'views/front/index.html';
endif;

# test commit