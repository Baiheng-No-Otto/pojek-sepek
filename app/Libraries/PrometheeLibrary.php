<?php

namespace App\Libraries;

class PrometheeLibrary
{
    protected $alternatives;
    protected $criterias;

    public function __construct($alternatives, $criterias)
    {
        $this->alternatives = $alternatives;
        $this->criterias = $criterias;
    }

    public function runCalculation()
    {
        $n = count($this->alternatives);
        $leavingFlow = [];
        $enteringFlow = [];

        foreach ($this->alternatives as $index => $alt) {
            $leavingFlow[$index] = 0;
            $enteringFlow[$index] = 0;
        }

        foreach ($this->alternatives as $i => $altA) {
            foreach ($this->alternatives as $j => $altB) {
                if ($i === $j) continue;

                $totalPreference = 0;
                $totalWeight = 0;

                foreach ($this->criterias as $criteria) {
                    $valA = $altA['scores'][$criteria->id] ?? 0;
                    $valB = $altB['scores'][$criteria->id] ?? 0;

                    $d = ($criteria->type === 'maximize') ? ($valA - $valB) : ($valB - $valA);

                    $p = 0;
                    if ($d > 0) {
                        if ($criteria->preference_function === 'linear') {
                            $pThreshold = 500; 
                            $p = ($d >= $pThreshold) ? 1 : ($d / $pThreshold);
                        } else {
                            $p = 1;
                        }
                    }

                    // Mengalikan preferensi dengan bobot (1.0)
                    $totalPreference += $p * $criteria->weight;
                    $totalWeight += $criteria->weight;
                }

                // Indeks Preferensi Multikriteria (Total Preferensi / 8.0)
                $indeksMutiKriteria = $totalPreference / $totalWeight;

                $leavingFlow[$i] += $indeksMutiKriteria;
                $enteringFlow[$j] += $indeksMutiKriteria;
            }
        }

        $results = [];
        foreach ($this->alternatives as $i => $alt) {
            $lf = $leavingFlow[$i] / ($n - 1);
            $ef = $enteringFlow[$i] / ($n - 1);
            $nf = $lf - $ef;

            $results[] = [
                'nama_skin' => $alt['name'],
                'leaving_flow' => round($lf, 4),
                'entering_flow' => round($ef, 4),
                'net_flow' => round($nf, 4),
            ];
        }

        usort($results, function($a, $b) {
            return $b['net_flow'] <=> $a['net_flow'];
        });

        return $results;
    }
}