<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\CardService;

class CardController extends Controller
{
    protected $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * Get random cards for number of people.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getRandomCards(Request $request)
    {
        // Validate request fields
        $validator = Validator::make($request->all(), [
            'num_of_people' => 'required|integer|min:0'
        ]);
 
        // Action if validation failed
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->toArray() as $error) {
                $errors = array_merge($errors, $error);
            }

            return response()->json(['error' => 'Input value does not exist or value is invalid', 'details' => $errors], 400);
        }

        $peopleCards = $this->cardService->getPeopleCards($request->num_of_people);
        
        return response()->json($peopleCards, 200);
    }
}
