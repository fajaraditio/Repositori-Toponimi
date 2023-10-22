<?php

namespace App\Support;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Support\Facades\Http;

class AreaSupport
{
    public function retrieve()
    {
        $provinceResponse = Http::get('https://api.cahyadsn.com/provinces');

        if ($provinceResponse->ok()) {
            $provinces = $provinceResponse->json();

            foreach ($provinces['data'] as $province) {
                $createdProvince = Province::firstOrCreate(
                    [
                        'code' => $province['kode'],
                        'name' => $province['nama'],
                    ]
                );

                $regencyResponse = Http::get('https://api.cahyadsn.com/regencies/' . $province['kode']);

                if ($regencyResponse->ok()) {
                    foreach ($regencyResponse['data'] as $regency) {
                        $createdRegency = Regency::firstOrCreate(
                            [
                                'code'          => $regency['kode'],
                            ],
                            [
                                'province_id'   => $createdProvince->id,
                                'name'          => $regency['nama'],
                            ]
                        );

                        $districtResponse = Http::get('https://api.cahyadsn.com/districts/' . $regency['kode']);

                        if ($districtResponse->ok()) {
                            foreach ($districtResponse['data'] as $district) {
                                $createdDistrict = District::firstOrCreate(
                                    [
                                        'code'          => $district['kode'],
                                    ],
                                    [
                                        'regency_id'    => $createdRegency->id,
                                        'name'          => $district['nama'],
                                    ]
                                );

                                $villageResponse = Http::get('https://api.cahyadsn.com/villages/' . $district['kode']);

                                if ($villageResponse->ok()) {
                                    foreach ($villageResponse['data'] as $village) {
                                        Village::firstOrCreate(
                                            [
                                                'code'          => $village['kode'],
                                            ],
                                            [
                                                'district_id'   => $createdDistrict->id,
                                                'name'          => $village['nama'],
                                            ]
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
