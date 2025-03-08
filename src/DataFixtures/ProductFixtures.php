<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Electronics', 'Clothing', 'Books', 'Accessories'];

        for ($i = 1; $i <= 20; $i++) {
            $product = new Product();
            $product->setTitle("Product $i")
                ->setShortDescription("Description for Product $i")
                ->setPriceExclVat(mt_rand(10, 500))
                ->setCategory($categories[array_rand($categories)]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
