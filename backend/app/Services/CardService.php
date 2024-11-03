<?php

namespace App\Services;

use App\Traits\CardTrait;

class CardService
{
    use CardTrait;

    /**
     * Generate random cards to number of people.
     *
     * @param int $numOfPeople
     * @return array
     */
    public function getPeopleCards($numOfPeople)
    {
        $cardList = $this->getCardList();

        $peopleCards = [];
        foreach ($cardList as $card) {
            $randomPeople = random_int(0, ($numOfPeople - 1));

            if (!isset($peopleCards[$randomPeople]))
                $peopleCards[$randomPeople] = [];
            
            $peopleCards[$randomPeople][] = $card;
        }

        return $peopleCards;
    }
}