<?php
    /**
    *  Copyright (c) BNPHU. All rights reserved. Licensed under the GPL license.
    *  See LICENSE in the project root for license information.
    *
    *  PHP version 7
    *
    *  @category vista
    *  @package correspondencia
    *  @author   Josué Serulle Cabreja <jota_serulle@hotmail.com>
    *  @license GPL
    *  @link https://github.com/josueSerulle/correspondencia
    */
    session_destroy();
        echo '<script>
                window.location = "http://localhost:8000/correspondencia";
            </script>';