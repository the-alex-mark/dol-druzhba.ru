<?php

    $images = [
        'https://sun9-22.userapi.com/c637724/v637724512/26ae/T5_nyHP924k.jpg',
        'https://sun9-40.userapi.com/c637724/v637724512/26c0/f0cuVcdiJp8.jpg',
        'https://sun9-62.userapi.com/c637724/v637724512/26e4/DnTCvV6Rc2U.jpg',
        'https://sun9-33.userapi.com/c637724/v637724512/2708/4APNKR1krUI.jpg',
        'https://sun9-14.userapi.com/c637724/v637724512/2711/JpTk78mwlT8.jpg',
        'https://sun9-13.userapi.com/c636329/v636329434/1c8c3/3KOXvgYcDZo.jpg',
        'https://sun9-27.userapi.com/c636329/v636329434/1c89e/yC3YVsjlpQ4.jpg',
        'https://sun9-27.userapi.com/c636329/v636329434/1c8eb/4cA0jrcE16E.jpg',
        'https://sun9-43.userapi.com/c636329/v636329434/1c9bf/2aunG32dcqo.jpg',
        'https://sun9-2.userapi.com/c636329/v636329434/1ca4a/JgVt3KQrT4k.jpg',
        'https://sun9-14.userapi.com/c636329/v636329434/1cab6/vjzMVTDC8yc.jpg',
        'https://sun9-40.userapi.com/c636329/v636329434/1cb3a/Fu0AcqC3OvU.jpg',
        'https://sun9-60.userapi.com/c636329/v636329434/1cc3f/FXnwGFVMIcI.jpg',
        'https://sun9-65.userapi.com/c636329/v636329434/1cc87/MFPfNnbxGSE.jpg',
        'https://sun9-36.userapi.com/c636329/v636329434/1cd06/Dj5ctgGscjE.jpg',
        'https://sun9-57.userapi.com/c636329/v636329434/1cd33/78fGAxEKXKA.jpg',
        'https://sun9-70.userapi.com/c636329/v636329434/1cd69/U3Cs0Mmsx08.jpg',
        'https://sun9-63.userapi.com/c636329/v636329512/355f1/bbJr2u2RWUA.jpg',
        'https://sun9-36.userapi.com/c636329/v636329512/35597/vrJShfG-LHA.jpg',
        'https://sun9-54.userapi.com/c636329/v636329512/3566f/KsfPNW9jnpg.jpg',
        'https://sun9-25.userapi.com/c636329/v636329512/356c0/WEIv1NQT368.jpg',
        'https://sun9-59.userapi.com/c636021/v636021434/1cc43/oXdlaOAMqEA.jpg',
        'https://sun9-34.userapi.com/c636021/v636021434/1cd51/e1-6uJZDBZo.jpg',
        'https://sun9-2.userapi.com/c636021/v636021434/1ccf0/GDNSahFhaWM.jpg',
        'https://sun9-22.userapi.com/c636021/v636021434/1ced5/NGCpyoQee7w.jpg',
        'https://sun9-10.userapi.com/c630323/v630323434/3ecd2/Gfgu89JibIU.jpg',
        'https://sun9-61.userapi.com/c630323/v630323434/3ed08/U22RkfPQR40.jpg'
    ];

    foreach ($images as $image) {
        // Создаем массив данных новой записи
        $post_data = [
            'post_title'    => wp_strip_all_tags(''),
            'post_content'  => '',
            'post_type'     => 'gallery',
            'tax_input'     => [ 'year' => [ 'year-2016' ], 'mark' => [ 'three' ] ],
            'post_status'   => 'publish',
            'post_author'   => 1, 
        ];

        // Вставляем запись в базу данных
        $post_id = wp_insert_post($post_data);

        // Заполнение пользовательских полей
        add_post_meta($post_id, 'image-url', $image, true);
    }

?>