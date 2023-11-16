<?php

namespace App\Services;

use App\Models\Embedding;
use Pgvector\Laravel\Vector;

class Searcher
{
    public function query($file_id, $query)
    {
        $gateway = new QueenbeeGateway();
        $result = $gateway->createEmbedding($query);
        print_r("Embedding length: " . count($result[0]["embedding"]) . "\n");

        $embedding = new Vector($result[0]["embedding"]);

        // Execute the query and get the results
        $searchResults = Embedding::query()
            ->where('file_id', $file_id)
            ->orderByRaw('embedding <-> ?', [$embedding])
            ->take(3)
            ->pluck('metadata');

        // Format the response with the actual search results
        return [
          "ok" => true,
          "results" => $searchResults
        ];
    }
}
