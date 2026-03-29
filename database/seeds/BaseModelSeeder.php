<?php

use App\Models\BaseModel;
use Illuminate\Database\Seeder;

class BaseModelSeeder extends Seeder
{
    public function run()
    {
        BaseModel::truncate();

        $models = [
            [
                'title'      => 'ARCANA AYAKASHI',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/68320440b6a50c0f61e533562d32a537.jpg',
                'url'        => 'https://theend0304.base.shop/items/71459134',
                'price'      => 180000,
                'sort_order' => 1,
            ],
            [
                'title'      => 'ARCANA ABYSPEY',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/f5bc654e41b0e3a9dae198455773a55b.jpg',
                'url'        => 'https://theend0304.base.shop/items/69282819',
                'price'      => 150000,
                'sort_order' => 2,
            ],
            [
                'title'      => 'ARCANA FIRST TRUCKER',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/192f3f1f35300f4f407378821bc0c56a.jpg',
                'url'        => 'https://theend0304.base.shop/items/68249587',
                'price'      => 150000,
                'sort_order' => 3,
            ],
            [
                'title'      => 'ARCANA 38 / SUNPACHI',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/21de59bede91b4fe2c6a0792bfcc054f.jpg',
                'url'        => 'https://theend0304.base.shop/items/69179826',
                'price'      => 250000,
                'sort_order' => 4,
            ],
            [
                'title'      => 'ARCANA DISPATCH RIDERS',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/22e83f5e6e5de24c7dee7c31750d08ce.jpg',
                'url'        => 'https://theend0304.base.shop/items/70937683',
                'price'      => 198000,
                'sort_order' => 5,
            ],
            [
                'title'      => 'ARCANA UNGAIKYO',
                'image'      => 'https://base-ec2.akamaized.net/images/item/origin/2798dc616a73852f09b64086c3d576f4.jpg',
                'url'        => 'https://theend0304.base.shop/items/71459275',
                'price'      => 99800,
                'sort_order' => 6,
            ],
        ];

        foreach ($models as $data) {
            BaseModel::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
