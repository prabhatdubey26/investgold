<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => '1 KG Gold Cast Bar',
                'image' => '1kg Gold Cast Bar.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '1 KG Gold Medallion',
                'image' => '1kg Gold Medallion.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '1 oz Gold Medallion',
                'image' => '1oz Gold Medallion.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '2 oz Gold Medallion',
                'image' => '2oz Gold Medallion.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '5 oz Gold Cast Bar',
                'image' => '5oz Gold Medallion.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '10 Gram Gold Medallion',
                'image' => '10g Gold Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '50 Gram Gold Medallion',
                'image' => '50g Gold Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '100 Gram Gold Medallion',
                'image' => '100g Gold Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'gold',
                'currency'=>'MUR'
            ],
            [
                'title' => '¼ Oz Gold Krugerrand',
                'image' => '¼ Oz Gold Krugerrand.png',
                'country' => 'South Africa',
                'type' => 'gold',
                'currency'=>'RAND'
            ],
            [
                'title' => '½ Oz Gold Krugerrand',
                'image' => '½ Oz Gold Krugerrand.png',
                'country' => 'South Africa',
                'type' => 'gold',
                'currency'=>'RAND'
            ],
            [
                'title' => '1 Oz Gold Krugerrand',
                'image' => '1 Oz Gold Krugerrand.png',
                'country' => 'South Africa',
                'type' => 'gold',
                'currency'=>'RAND'
            ],
            [
                'title' => '1-10 oz Gold Krugerrand',
                'image' => '1-10 oz Gold Krugerrand.png',
                'country' => 'South Africa',
                'type' => 'gold',
                'currency'=>'RAND'
            ],
       
            [
                'title' => '1 KG Silver Cast Bar',
                'image' => '1kg Silver Cast Bar.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '1 KG Silver Medallion',
                'image' => '1kg Silver Medallion.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '1 oz Silver Medallion',
                'image' => '1oz Silver Medallion.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '2 oz Silver Medallion',
                'image' => '2oz Silver Medallion.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '5 oz Silver Cast Bar',
                'image' => '5oz Silver Medallion.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '10 Gram Silver Medallion',
                'image' => '10g Silver Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '50 Gram Silver Medallion',
                'image' => '50g Silver Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '100 Gram Silver Medallion',
                'image' => '100g Silver Minted Bar.png',
                'country' => 'mauritius',
                'type' => 'silver',
                'currency'=>'MUR'
            ],
            [
                'title' => '1 KG Silver Bar',
                'image' => '1kg Silver Bar.png',
                'country' => 'South Africa',
                'type' => 'silver',
                'currency'=>'RAND'
            ],
            [
                'title' => '1 oz Silver Krugerrand',
                'image' => '1 oz Silver Krugerrand.png',
                'country' => 'South Africa',
                'type' => 'silver',
                'currency'=>'RAND'
            ],
            [
                'title' => '1oz Silver Medallion',
                'image' => '1oz Silver Medallion.png',
                'country' => 'South Africa',
                'type' => 'silver',
                'currency'=>'RAND'
            ]
        ];

       foreach ($products as $key => $value) {
         Product::create($value);
       }
    }
}
