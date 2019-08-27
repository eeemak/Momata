<?php

return [

   'title'=> 'Momata',
   'view_root'=> 'dashboard.contents.',
   'input_date_format'=> 'd/m/Y', // Use same date format in frontend datetimepicker

   'modules'=> [
      'profile'=>[
         'upload_file_location'=>'uploads/profile/', //from public
         'upload_max_file_size'=>'500', //in KB
         'upload_accept_file_type'=>'png,jpg,jpeg,bmp',
      ],
      'mission'=>[
         'upload_file_location'=>'uploads/mission/', //from public
         'upload_max_file_size'=>'500', //in KB
         'upload_accept_file_type'=>'png,jpg,jpeg,bmp',
         'featured_max_item'=>'3',
         'use_datatable'=>true,
      ],
      'project'=>[
         'upload_file_location'=>'uploads/project/', //from public
         'upload_max_file_size'=>'500', //in KB
         'upload_accept_file_type'=>'png,jpg,jpeg,bmp',
         'featured_max_item'=>'3',
         'use_datatable'=>true,
      ],
      'news'=>[
         'upload_file_location'=>'uploads/news/', //from public
         'upload_max_file_size'=>'500', //in KB
         'upload_accept_file_type'=>'png,jpg,jpeg,bmp',
         'featured_max_item'=>'3',
         'use_datatable'=>true,
      ],
      'event'=>[
         'upload_file_location'=>'uploads/event/', //from public
         'upload_max_file_size'=>'500', //in KB
         'upload_accept_file_type'=>'png,jpg,jpeg,bmp',
         'featured_max_item'=>'2',
         'use_datatable'=>true,
      ],
   ],
];
