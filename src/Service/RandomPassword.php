<?php


namespace App\Service;

class RandomPassword
{
    public function randomPassword(int $length)
    {
        $upperLetters = $this->generatecharCodeRange([65, 90]);

        $lowerletters = $this->generatecharCodeRange([97, 122]);

        $numbers = $this->generatecharCodeRange([48, 57]);

        $symbols = $this->generatecharCodeRange([33, 47, 58, 64, 91, 96, 123, 126]);

        $all = array_merge($upperLetters, $lowerletters, $numbers, $symbols);

        $isArrayShuffled = shuffle($all);

        if (!$isArrayShuffled) {
            throw new \LogicException("La génération d'un mot de passe a échouée.");
        }

        return implode('', array_slice($all, 0, $length));
    }

    private function generatecharCodeRange(array $range)
    {
        if (count($range) === 2) {
            return range(chr($range[0]), chr($range[1]));
        } else {
            return array_merge(...array_map(fn ($range) => range(chr($range[0]), chr($range[1])), array_chunk($range, 2)));
        }
    }
}