<?php

namespace Database\Seeds;

use \Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Exceptions\UsageNotFoundException;
use App\Exceptions\ArtistNotFoundException;
use App\Exceptions\DpContractNotFoundException;
use App\Exceptions\MusicContractNotFoundException;

class InitialTestingSeeder extends Seeder
{

    protected function getArtistId($artist_name) {
        $artists = DB::select(
            'SELECT id from artists where artist_name = ?',
            [$artist_name]
        );

        if (empty($artists[0]->id)) {
            throw new ArtistNotFoundException("$artist_name was not found during seeding.");
        }

        return $artists[0]->id;
    }

    protected function getUsageId($usage_name) {
        $usages = DB::select(
            'SELECT id from usages where usage_name = ?',
            [$usage_name]
        );

        if (empty($usages[0]->id)) {
            throw new UsageNotFoundException("$usage_name was not found during seeding.");
        }

        return $usages[0]->id;
    }

    protected function getDpContractId($partner_name) {
        $contracts = DB::select(
            'SELECT id from dp_contracts where partner_name = ?',
            [$partner_name]
        );

        if (empty($contracts[0]->id)) {
            throw new DpContractNotFoundException("Dp Contract for $partner_name was not found during seeding.");
        }

        return $contracts[0]->id;
    }

    protected function getContractIdByArtistIdAndSongTitle($artist_id, $song_title)
    {
        $contracts = DB::select(
            'SELECT id from music_contracts where artist_id = ? and song_title = ?',
            [
                $artist_id,
                $song_title,
            ]
        );

        if (empty($contracts[0]->id)) {
            throw new MusicContractNotFoundException("Music contract with artist_id $artist_id and song_title $song_title was not found during seeding.");
        }

        return $contracts[0]->id;

    }

    protected function seedArtists()
    {
            DB::table('artists')->insert([
                'artist_name'=>'Tinie Tempah',
            ]);

            DB::table('artists')->insert([
                'artist_name'=>'Monkey Claw',
            ]);
    }

    protected function seedUsages()
    {
            DB::table('usages')->insert([
                'usage_name'=>'digital download',
            ]);

            DB::table('usages')->insert([
                'usage_name'=>'streaming',
            ]);
    }

    protected function seedMusicContracts()
    {
        DB::table('music_contracts')->insert(
            [
                [
                    'artist_id'=>$this->getArtistId('Tinie Tempah'),
                    'song_title'=>"Frisky (Live from SoHo)",
                    'start_date'=>'2012-02-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Tinie Tempah'),
                    'song_title'=>"Miami 2 Ibiza",
                    'start_date'=>'2012-02-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Tinie Tempah'),
                    'song_title'=>"Till I'm Gone",
                    'start_date'=>'2012-08-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Monkey Claw'),
                    'song_title'=>"Black Mountain",
                    'start_date'=>'2012-02-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Monkey Claw'),
                    'song_title'=>"Iron Horse",
                    'start_date'=>'2012-06-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Monkey Claw'),
                    'song_title'=>"Motor Mouth",
                    'start_date'=>'2012-03-01',
                    'end_date'=>null,
                ],
                [
                    'artist_id'=>$this->getArtistId('Monkey Claw'),
                    'song_title'=>"Christmas Special",
                    'start_date'=>'2012-12-25',
                    'end_date'=>'2012-12-31',
                ],
            ]
        );
    }

    protected function seedMusicContractUsage()
    {
            DB::table('music_contract_usage')->insert(
                [
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Tinie Tempah'),
                                "Frisky (Live from Soho)"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Tinie Tempah'),
                                "Frisky (Live from Soho)"
                        ),
                        'usage_id'=>$this->getUsageId('streaming'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Tinie Tempah'),
                                "Miami 2 Ibiza"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Tinie Tempah'),
                                "Till I'm Gone"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Black Mountain"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Iron Horse"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Iron Horse"
                        ),
                        'usage_id'=>$this->getUsageId('streaming'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Motor Mouth"
                        ),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Motor Mouth"
                        ),
                        'usage_id'=>$this->getUsageId('streaming'),
                    ],
                    [
                        'music_contract_id'=>$this->getContractIdByArtistIdAndSongTitle(
                                $this->getArtistId('Monkey Claw'),
                                "Christmas Special"
                        ),
                        'usage_id'=>$this->getUsageId('streaming'),
                    ],
                ]
            );
    }

    protected function seedDpContracts()
    {
            DB::table('dp_contracts')->insert([
                'partner_name'=>'iTunes',
            ]);

            DB::table('dp_contracts')->insert([
                'partner_name'=>'YouTube',
            ]);
    }

    protected function seedDpContractUsage()
    {
            DB::table('dp_contract_usage')->insert(
                [
                    [
                        'dp_contract_id'=>$this->getDpContractId('iTunes'),
                        'usage_id'=>$this->getUsageId('digital download'),
                    ],
                    [
                        'dp_contract_id'=>$this->getDpContractId('YouTube'),
                        'usage_id'=>$this->getUsageId('streaming'),
                    ]
                ]
            );

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // seed artists
            $this->seedArtists();

            // seed usages
            $this->seedUsages();

            // seed music_contracts
            $this->seedMusicContracts();

            // seed music_contract_usage mapping table
            $this->seedMusicContractUsage();

            // see dp_contracts
            $this->seedDpContracts();

            // seed dp_contract_usage mapping table
            $this->seedDpContractUsage();

        } catch (ArtistNotFoundException $e) {
            echo 'Artist not found when trying to set up seeds: ' . $e->getMessage() . "\n";
        } catch (UsageNotFoundException $e) {
            echo 'Usage not found when trying to set up seeds: ' . $e->getMessage() . "\n";
        } catch (DpContractNotFoundException $e) {
            echo 'Dp Contract not found when trying to set up seeds: ' . $e->getMessage() . "\n";
        } catch (MusicContractNotFoundException $e) {
            echo 'Music Contract not found when trying to set up seeds: ' . $e->getMessage() . "\n";
        } catch (Exception $e) {
            echo 'Unknown error while running seeds: ' . $e->getMessage() . "\n";
        }
    }
}
