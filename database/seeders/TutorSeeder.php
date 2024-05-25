<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tutors')->insert([    
            [
               'nom' => 'Kelly',
               'prenom' => 'Ryan',
               'domaine' => 'programmation',
               'image' => 'https://deadline.com/wp-content/uploads/2017/03/lucifer-212_scn33pt1_mc0149_hires2.jpg?w=681&h=383&crop=1',
               
            ],
           
            [
               'nom' => 'Murnix',
               'prenom' => 'Peter',
               'domaine' => 'Mathématique',
               'image' => 'https://th.bing.com/th/id/R.06ef75c0d8943a1fb741ae46af35d5c7?rik=l8A91bLPc6KQ%2bw&riu=http%3a%2f%2fimages2.fanpop.com%2fimage%2fphotos%2f10000000%2fJames-Variety-Studio-At-Sundance-Day-1-james-franco-10084000-358-500.jpg&ehk=qZJXeKdW6lGtxrp4ZqBjGyFnP7Pt%2fw2SkDMsfHihAvk%3d&risl=&pid=ImgRaw&r=0',
               
           ],
     
           [
               'nom' => 'Vescio',
               'prenom' => 'Dave',
               'domaine' => 'Francais',
               'image' => 'https://th.bing.com/th/id/R.e4d07dc81a9675e91ff27c5376530ccd?rik=nx66w%2biifraYwQ&riu=http%3a%2f%2fimg3.wikia.nocookie.net%2f__cb20140729061957%2funderthedome%2fimages%2f4%2f43%2fJunior_205.png&ehk=4VCvUCZmilT1cAPHDUPm88a7anAwTWCcLUwawOAcYHc%3d&risl=&pid=ImgRaw&r=0',
               
            ],
           
            [
                'nom' => 'Moris',
                'prenom' => '  Jessyca',
                'domaine' => 'web',
                'image' => 'https://i.pinimg.com/736x/40/51/2c/40512c141e5f1968a466588e903a3cfd.jpg',
                
            ],
     
            [
               'nom' => 'Wanloss',
               'prenom' => 'Lynn',
               'domaine' => 'philosophie',
               'image' => 'https://m.media-amazon.com/images/M/MV5BMTM1MjQ1OTA1NF5BMl5BanBnXkFtZTcwNzUwNzkwMw@@._V1_FMjpg_UX636_.jpg',
               
            ],
        ]);   
    
}

}

