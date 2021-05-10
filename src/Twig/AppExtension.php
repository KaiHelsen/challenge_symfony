<?php
declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('price', [$this, 'formatPrice']),
        ];
    }

    public function getFunctions(): array
    {
        return [

            //okay let's lay this out so we know what's going on here
            //the name, in this case 'price', refers to the name of the function as it is being called in twig.
            //the array input is, first, the input in twig (in this case, a float, per the tutorial, along with some extra variables for formatting)
            //and the 'formatPrice' is a callback reference to our defined function
            //simple, right? RIGHT?

            //this also applies to the getfilters function.

            new TwigFunction('price', [$this, 'formatPrice']),
            new TwigFunction('ipsum', [$this, 'GenerateLoremIpsum']),
        ];
    }

    public function formatPrice($number, $decimals = 0, $decPoint = '.', $thousandsSep = ','): string
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$' . $price;

        return $price;
    }

    public function GenerateLoremIpsum(int $wordCount): string
    {
        //let's do this the lazy way first.
        //  return "lorem ipsum";
        //now let's do it slightly less lazy.
        $words =
            [
                'lorem',
                'ipsum',
                'et',
                'et',
                'et',
                'ego',
                'ego',
                'solvent',
                'placitus',
                'tretium',
                'carnella',
                'leptatem',
                'ide',
                'eunt',
                'domum',
                'lepis',
                'trellium',
                'pereneum',
                'major',
                'nutella',
                'cantus',
                'ego',
                'vos',
                'pedicabo',
                'et',
                'irrumabo',
                'perturabo',
                'guilliman',
                'cato',
                'sicarius',
                'roboute',
                'Ultramar',
                'marneus',
                'calgar',
                'marius',
                'gaius',
                'corvo',
                'cestus',
                'oberdeii',
                'remus',
                'ventanus',
                'rubio',
                'tylos',
                'marcellus',
                'adeptus',
                'custodes',
                'astartes',
                'mars',
                'terra',
                'armageddon',
                'leman',
                'russ',
                'sanguinius',
                'horus',
                'corvus',
                'corax',
                'vulkan',
                'nobilis',
                'navis',
                'ordo',
                'officio',
                'munitorum',
                'administratum',
                'Imperium',
                'paternova',
                'senatorum',
                'imperialis',

            ];

        $markings =
        [
          ',',
            '.',
            '?',
            '!',
            ';',
            '-'
        ];

        $output = "Lorem ipsum";
        $counter = random_int(2,12);
        for($i = 2; $i < $wordCount; $i++)
        {
            $wordIndex = random_int(0, count($words) - 1);
            if($counter <= 0)
            {
                //reset counter
                $counter = random_int(2,12);

                $markingIndex = random_int(0,count($markings) - 1);
                $output .= $markings[$markingIndex] . " " . ucfirst($words[$wordIndex]);
            }
            else
            {
                $output .= " " . $words[$wordIndex];
            }

            $counter--;
        }

        $output .= ".";

        return $output;

    }
}
