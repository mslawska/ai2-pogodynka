<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{country}/{city}', name: 'app_weather')]

    public function city(string $country, string $city, LocationRepository $locationRepository, MeasurementRepository $repository): Response

    {
        $location = $locationRepository->findOneBy([
            'country' => strtoupper($country),
            'city' => ucfirst($city),
        ]);

        $measurements = $repository->findByLocation($location);

        return $this->render('weather/city.html.twig', [

            'location' => $location,
            'measurements' => $measurements,

        ]);
    }
}
