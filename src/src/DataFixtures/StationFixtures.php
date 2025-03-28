<?php

namespace App\DataFixtures;

use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StationFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    foreach($this->getData() as $data) {
      $station = new Station();
      $station->setGid($data['gid']);
      $station->setNom($data['nom']);
      $station->setEtat($data['etat']);
      $station->setCommune($data['commune']);
      $station->setLatitude($data['latitude']);
      $station->setLatitude($data['latitude']);
      $station->setLatitude($data['latitude']);
      $station->setLongitude($data['longitude']);
      $station->setNbplaces($data['nbplaces']);
      $station->setNbvelos($data['nbvelos']);
      $station->setNbclassiq($data['nbclassiq']);
      $station->setNbelec($data['nbelec']);
      $station->setCdate(new \DateTimeImmutable($data['cdate']));
      $station->setMdate(new \DateTimeImmutable($data['mdate']));
      $manager->persist($station);
    }
    $manager->flush();
  }

  private function getData(): array {
    return [
        [
            "id" => 1,
            "gid" => 1,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Meriadeck",
            "nbplaces" => 34,
            "nbvelos" => 8,
            "nbclassiq" => 6,
            "nbelec" => 2,
            "latitude" => 44.83803,
            "longitude" => -0.58437,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 2,
            "gid" => 2,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "St Bruno",
            "nbplaces" => 11,
            "nbvelos" => 9,
            "nbclassiq" => 3,
            "nbelec" => 6,
            "latitude" => 44.83784,
            "longitude" => -0.59028,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 3,
            "gid" => 3,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Piscine Judaique",
            "nbplaces" => 22,
            "nbvelos" => 3,
            "nbclassiq" => 2,
            "nbelec" => 1,
            "latitude" => 44.840813,
            "longitude" => -0.593233,
            "cdate" => "2024-04-20T02:19:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 4,
            "gid" => 4,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "St Seurin",
            "nbplaces" => 8,
            "nbvelos" => 8,
            "nbclassiq" => 5,
            "nbelec" => 3,
            "latitude" => 44.84221,
            "longitude" => -0.58482,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 5,
            "gid" => 5,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Place Gambetta",
            "nbplaces" => 44,
            "nbvelos" => 1,
            "nbclassiq" => 1,
            "nbelec" => 0,
            "latitude" => 44.840712,
            "longitude" => -0.581124,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 6,
            "gid" => 6,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Square Andre Lhote",
            "nbplaces" => 38,
            "nbvelos" => 1,
            "nbclassiq" => 0,
            "nbelec" => 1,
            "latitude" => 44.83779,
            "longitude" => -0.58166,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 7,
            "gid" => 7,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Palais de Justice",
            "nbplaces" => 26,
            "nbvelos" => 1,
            "nbclassiq" => 1,
            "nbelec" => 0,
            "latitude" => 44.83594,
            "longitude" => -0.58211,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 8,
            "gid" => 9,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Stade Chaban Delmas",
            "nbplaces" => 13,
            "nbvelos" => 8,
            "nbclassiq" => 2,
            "nbelec" => 6,
            "latitude" => 44.83176,
            "longitude" => -0.59868,
            "cdate" => "2024-04-10T14:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 9,
            "gid" => 10,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Cite Administrative",
            "nbplaces" => 25,
            "nbvelos" => 4,
            "nbclassiq" => 2,
            "nbelec" => 2,
            "latitude" => 44.84166,
            "longitude" => -0.5997,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 10,
            "gid" => 11,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Grand Lebrun",
            "nbplaces" => 6,
            "nbvelos" => 9,
            "nbclassiq" => 7,
            "nbelec" => 2,
            "latitude" => 44.85115,
            "longitude" => -0.60861,
            "cdate" => "2024-04-10T16:33:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 11,
            "gid" => 12,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Barriere St Medard",
            "nbplaces" => 12,
            "nbvelos" => 8,
            "nbclassiq" => 4,
            "nbelec" => 4,
            "latitude" => 44.84837,
            "longitude" => -0.5981,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 12,
            "gid" => 13,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Dubreuil Turenne",
            "nbplaces" => 22,
            "nbvelos" => 8,
            "nbclassiq" => 6,
            "nbelec" => 2,
            "latitude" => 44.84819,
            "longitude" => -0.59197,
            "cdate" => "2024-04-10T15:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 13,
            "gid" => 14,
            "commune" => "Bordeaux",
            "etat" => "MAINTENANCE",
            "nom" => "Capdeville",
            "nbplaces" => 0,
            "nbvelos" => 0,
            "nbclassiq" => 0,
            "nbelec" => 0,
            "latitude" => 44.844195,
            "longitude" => -0.588766,
            "cdate" => "2024-05-04T02:19:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 14,
            "gid" => 15,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Galin",
            "nbplaces" => 8,
            "nbvelos" => 10,
            "nbclassiq" => 6,
            "nbelec" => 4,
            "latitude" => 44.84947,
            "longitude" => -0.54525,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 15,
            "gid" => 16,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Palais Gallien",
            "nbplaces" => 13,
            "nbvelos" => 1,
            "nbclassiq" => 1,
            "nbelec" => 0,
            "latitude" => 44.8469,
            "longitude" => -0.58219,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 16,
            "gid" => 17,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Huguerie",
            "nbplaces" => 9,
            "nbvelos" => 5,
            "nbclassiq" => 3,
            "nbelec" => 2,
            "latitude" => 44.84423,
            "longitude" => -0.58164,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 17,
            "gid" => 18,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Place Tourny",
            "nbplaces" => 25,
            "nbvelos" => 5,
            "nbclassiq" => 2,
            "nbelec" => 3,
            "latitude" => 44.84465,
            "longitude" => -0.57745,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 18,
            "gid" => 19,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Grands Hommes",
            "nbplaces" => 29,
            "nbvelos" => 2,
            "nbclassiq" => 0,
            "nbelec" => 2,
            "latitude" => 44.84314,
            "longitude" => -0.57724,
            "cdate" => "2024-04-10T16:33:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 19,
            "gid" => 20,
            "commune" => "Bordeaux",
            "etat" => "DECONNECTEE",
            "nom" => "Puy Paulin",
            "nbplaces" => 9,
            "nbvelos" => 6,
            "nbclassiq" => 4,
            "nbelec" => 2,
            "latitude" => 44.84122,
            "longitude" => -0.5756,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 20,
            "gid" => 21,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Republique",
            "nbplaces" => 39,
            "nbvelos" => 0,
            "nbclassiq" => 0,
            "nbelec" => 0,
            "latitude" => 44.83483,
            "longitude" => -0.58019,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 21,
            "gid" => 22,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Liberation",
            "nbplaces" => 7,
            "nbvelos" => 3,
            "nbclassiq" => 3,
            "nbelec" => 0,
            "latitude" => 44.83325,
            "longitude" => -0.58308,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 22,
            "gid" => 23,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Francois de Sourdis",
            "nbplaces" => 13,
            "nbvelos" => 1,
            "nbclassiq" => 0,
            "nbelec" => 1,
            "latitude" => 44.831,
            "longitude" => -0.58734,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 23,
            "gid" => 24,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Xaintrailles",
            "nbplaces" => 12,
            "nbvelos" => 3,
            "nbclassiq" => 2,
            "nbelec" => 1,
            "latitude" => 44.82797,
            "longitude" => -0.59349,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 24,
            "gid" => 25,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Bordeaux II",
            "nbplaces" => 16,
            "nbvelos" => 4,
            "nbclassiq" => 3,
            "nbelec" => 1,
            "latitude" => 44.82654,
            "longitude" => -0.60184,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 25,
            "gid" => 26,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Hopital Pellegrin",
            "nbplaces" => 31,
            "nbvelos" => 0,
            "nbclassiq" => 0,
            "nbelec" => 0,
            "latitude" => 44.82986,
            "longitude" => -0.60351,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 26,
            "gid" => 27,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "St Augustin",
            "nbplaces" => 18,
            "nbvelos" => 1,
            "nbclassiq" => 0,
            "nbelec" => 1,
            "latitude" => 44.832736,
            "longitude" => -0.60997,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 27,
            "gid" => 28,
            "commune" => "Mérignac",
            "etat" => "CONNECTEE",
            "nom" => "Place Mondesir",
            "nbplaces" => 11,
            "nbvelos" => 5,
            "nbclassiq" => 3,
            "nbelec" => 2,
            "latitude" => 44.83838,
            "longitude" => -0.61689,
            "cdate" => "2024-04-13T02:21:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 28,
            "gid" => 29,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Cauderan",
            "nbplaces" => 14,
            "nbvelos" => 1,
            "nbclassiq" => 0,
            "nbelec" => 1,
            "latitude" => 44.85175,
            "longitude" => -0.61438,
            "cdate" => "2024-04-10T16:33:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 29,
            "gid" => 30,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Parc Bordelais",
            "nbplaces" => 10,
            "nbvelos" => 6,
            "nbclassiq" => 4,
            "nbelec" => 2,
            "latitude" => 44.85261,
            "longitude" => -0.59923,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 30,
            "gid" => 31,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Barriere du Medoc",
            "nbplaces" => 16,
            "nbvelos" => 4,
            "nbclassiq" => 3,
            "nbelec" => 1,
            "latitude" => 44.854092,
            "longitude" => -0.593128,
            "cdate" => "2024-04-20T02:19:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 31,
            "gid" => 32,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Tivoli",
            "nbplaces" => 10,
            "nbvelos" => 4,
            "nbclassiq" => 3,
            "nbelec" => 1,
            "latitude" => 44.85379,
            "longitude" => -0.58864,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 32,
            "gid" => 33,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Croix de Seguey",
            "nbplaces" => 6,
            "nbvelos" => 12,
            "nbclassiq" => 9,
            "nbelec" => 3,
            "latitude" => 44.85005,
            "longitude" => -0.58547,
            "cdate" => "2024-04-10T15:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 33,
            "gid" => 34,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Place de Longchamps",
            "nbplaces" => 8,
            "nbvelos" => 9,
            "nbclassiq" => 2,
            "nbelec" => 7,
            "latitude" => 44.85005,
            "longitude" => -0.582,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 34,
            "gid" => 35,
            "commune" => "Bordeaux",
            "etat" => "DECONNECTEE",
            "nom" => "Jardin Public",
            "nbplaces" => 4,
            "nbvelos" => 0,
            "nbclassiq" => 0,
            "nbelec" => 0,
            "latitude" => 44.84849,
            "longitude" => -0.57581,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 35,
            "gid" => 36,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Fondaudege Museum",
            "nbplaces" => 13,
            "nbvelos" => 3,
            "nbclassiq" => 2,
            "nbelec" => 1,
            "latitude" => 44.84641,
            "longitude" => -0.5802,
            "cdate" => "2024-04-10T15:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 36,
            "gid" => 37,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Quinconces",
            "nbplaces" => 39,
            "nbvelos" => 1,
            "nbclassiq" => 0,
            "nbelec" => 1,
            "latitude" => 44.84423,
            "longitude" => -0.57434,
            "cdate" => "2024-04-10T14:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 37,
            "gid" => 38,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Grand Theatre",
            "nbplaces" => 19,
            "nbvelos" => 11,
            "nbclassiq" => 8,
            "nbelec" => 3,
            "latitude" => 44.84293,
            "longitude" => -0.5739,
            "cdate" => "2024-04-10T15:32:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 38,
            "gid" => 39,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Place St Projet",
            "nbplaces" => 3,
            "nbvelos" => 13,
            "nbclassiq" => 3,
            "nbelec" => 10,
            "latitude" => 44.83889,
            "longitude" => -0.57466,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 39,
            "gid" => 40,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Camille Jullian",
            "nbplaces" => 2,
            "nbvelos" => 14,
            "nbclassiq" => 8,
            "nbelec" => 6,
            "latitude" => 44.83924,
            "longitude" => -0.57203,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 40,
            "gid" => 41,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "St Paul",
            "nbplaces" => 21,
            "nbvelos" => 2,
            "nbclassiq" => 0,
            "nbelec" => 2,
            "latitude" => 44.83707,
            "longitude" => -0.57279,
            "cdate" => "2024-04-10T16:33:01.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 41,
            "gid" => 42,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Musee d'Aquitaine",
            "nbplaces" => 14,
            "nbvelos" => 6,
            "nbclassiq" => 4,
            "nbelec" => 2,
            "latitude" => 44.83606,
            "longitude" => -0.57544,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 42,
            "gid" => 43,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Place Ste Eulalie",
            "nbplaces" => 16,
            "nbvelos" => 4,
            "nbclassiq" => 4,
            "nbelec" => 0,
            "latitude" => 44.83312,
            "longitude" => -0.57695,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ],
        [
            "id" => 43,
            "gid" => 44,
            "commune" => "Bordeaux",
            "etat" => "CONNECTEE",
            "nom" => "Belcier Tram",
            "nbplaces" => 13,
            "nbvelos" => 8,
            "nbclassiq" => 7,
            "nbelec" => 1,
            "latitude" => 44.822803,
            "longitude" => -0.55293,
            "cdate" => "2011-01-01T00:00:00.000Z",
            "mdate" => "2024-05-23T19:30:00.000Z"
        ]
    ];
  }



}