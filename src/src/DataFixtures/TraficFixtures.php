<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Trafic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TraficFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $trafic = new Trafic();
            $trafic->setGid($data['gid']);
            $trafic->setEtat($data['etat']);
            $trafic->setGeoShape(json_decode($data['geo_shape'], true));
            $trafic->setCdate(new \DateTimeImmutable($data['cdate']));
            $trafic->setMdate(new \DateTimeImmutable($data['mdate']));
            $manager->persist($trafic);
        }
        $manager->flush();
    }

    private function getData(): array
    {
        return [
            [
                "id" => 1,
                "cdate" => "2020-12-10T15:44:22.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 213,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.602329,44.818685],[-0.602333,44.818913],[-0.60225,44.8192],[-0.602135,44.819596],[-0.602103,44.819697],[-0.602074,44.819842],[-0.602068,44.820482],[-0.602013,44.820833]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 2,
                "cdate" => "2020-12-10T15:44:22.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 214,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.602013,44.820833],[-0.601904,44.821323],[-0.601848,44.821487],[-0.601784,44.821597],[-0.601276,44.822267],[-0.601217,44.82237],[-0.601087,44.822671],[-0.601044,44.82288]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 3,
                "cdate" => "2020-12-10T15:44:22.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 215,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.600884,44.823094],[-0.600513,44.823321],[-0.600059,44.823625]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 4,
                "cdate" => "2020-12-10T15:44:22.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 216,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.600059,44.823625],[-0.599149,44.824636],[-0.598734,44.825065],[-0.598344,44.825484]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 5,
                "cdate" => "2020-12-10T15:44:22.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 217,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.596439,44.826845],[-0.595377,44.827042],[-0.594629,44.827181],[-0.594207,44.827273],[-0.593084,44.8274],[-0.592592,44.827455]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 6,
                "cdate" => "2020-12-10T15:54:51.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 218,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.598344,44.825484],[-0.598512,44.825298],[-0.598734,44.825065],[-0.600059,44.823625]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 7,
                "cdate" => "2020-12-10T15:55:23.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 219,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.600059,44.823625],[-0.600513,44.823321],[-0.600884,44.823094]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 8,
                "cdate" => "2020-12-10T16:04:32.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 220,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.601044,44.82288],[-0.601087,44.822671],[-0.601217,44.82237],[-0.601276,44.822267],[-0.601784,44.821597],[-0.601848,44.821487],[-0.601904,44.821323],[-0.602013,44.820833]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 9,
                "cdate" => "2020-12-10T16:05:56.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 221,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.59964,44.818933],[-0.59992,44.818933],[-0.600406,44.818931],[-0.600546,44.818924],[-0.600706,44.818914],[-0.60112,44.818871],[-0.601411,44.818823],[-0.601784,44.818722],[-0.602114,44.818612]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 10,
                "cdate" => "2020-12-10T16:59:01.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 222,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.624132,44.826325],[-0.622647,44.826484],[-0.621688,44.826549],[-0.621132,44.826559],[-0.620625,44.826554],[-0.620229,44.826498],[-0.619335,44.826476]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 11,
                "cdate" => "2020-12-10T17:41:35.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 223,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.619335,44.826476],[-0.618605,44.826479],[-0.617258,44.826361],[-0.616926,44.826344],[-0.616563,44.826357],[-0.616207,44.826387],[-0.615795,44.826459],[-0.615488,44.826546],[-0.615232,44.826631],[-0.614891,44.826754]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 12,
                "cdate" => "2020-12-10T17:43:33.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 224,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.614891,44.826754],[-0.613714,44.827322],[-0.612866,44.827746],[-0.612645,44.827858],[-0.612411,44.827974],[-0.612171,44.828085],[-0.612053,44.828138],[-0.611921,44.82819],[-0.611738,44.828256],[-0.611465,44.828346],[-0.611245,44.828418],[-0.611164,44.828438],[-0.611075,44.828458],[-0.609835,44.828864],[-0.609753,44.828913]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 13,
                "cdate" => "2020-12-10T17:47:27.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 225,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.609753,44.828913],[-0.609404,44.829029],[-0.608982,44.829198],[-0.60781,44.829589],[-0.60769,44.829623],[-0.607287,44.829721]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 14,
                "cdate" => "2020-12-10T17:48:37.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 226,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.607286,44.829721],[-0.607137,44.829766],[-0.606736,44.829875],[-0.606516,44.829939],[-0.606305,44.829989],[-0.606136,44.830014],[-0.605989,44.830025],[-0.605415,44.83005],[-0.60521,44.830076],[-0.605015,44.830084],[-0.603998,44.830126],[-0.603864,44.830129],[-0.603662,44.830085]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 15,
                "cdate" => "2020-12-10T17:49:32.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 227,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.602986,44.829274],[-0.603047,44.829516],[-0.603084,44.829616],[-0.603115,44.82967],[-0.603131,44.829717],[-0.60313,44.829764],[-0.603118,44.829822],[-0.603052,44.829978],[-0.602923,44.83033]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 16,
                "cdate" => "2020-12-10T17:50:40.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 228,
                "etat" => "FLUIDE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.602206,44.832452],[-0.602079,44.832921],[-0.60207,44.832961],[-0.602003,44.833045],[-0.601924,44.833114],[-0.601753,44.833222],[-0.601678,44.833251],[-0.601491,44.833306],[-0.600366,44.83328],[-0.599742,44.833264],[-0.599311,44.833239],[-0.598723,44.833221]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ],
            [
                "id" => 17,
                "cdate" => "2020-12-10T17:51:45.000Z",
                "mdate" => "2025-03-25T22:05:49.000Z",
                "gid" => 229,
                "etat" => "EMBOUTEILLE",
                "geo_shape" => "{\"type\":\"Feature\",\"geometry\":{\"coordinates\":[[-0.598561,44.833225],[-0.594823,44.833273]],\"type\":\"LineString\"},\"properties\":[]}",
                "typevoie" => "PENETRANTE"
            ]
        ];
    }


}