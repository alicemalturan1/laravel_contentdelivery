<?php
return [
    'ranks_routes'=>[
        [],
        [
            '*all*'
        ],
        [
            'create_blog_category',
            'create_blog_post',
            'list_blog_posts',
            'create_content',
            'create_content_category',
            'create_show_cases',
            'list_contents',
            'list_content_categories',
            'list_show_cases',
            'list_reports',
            'list_ratings',
            'blocks_info',

        ],
    ],
    'ranks'=>[
        ['name'=> 'Üye','color'=>'primary'], #0
        ['name'=>'Yönetici','color'=>'danger'], #1
        ['name'=>'Moderatör','color'=>'success'], #2
    ]
];
