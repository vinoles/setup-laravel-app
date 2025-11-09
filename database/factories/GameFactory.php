<?php

namespace Database\Factories;

use App\Models\GameStatus;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{
    public function definition(): array
    {
        $home = Team::query()->inRandomOrder()->first() ?? Team::factory()->create();
        $away = Team::query()
            ->where('id', '!=', $home->id)
            ->inRandomOrder()
            ->first() ?? Team::factory()->create();

        return [
            'uuid'         => Str::uuid(),
            'season_id'    => Season::query()->inRandomOrder()->value('id') ?? Season::factory(),
            'home_team_id' => $home->id,
            'away_team_id' => $away->id,
            'kickoff_at'   => $this->faker->dateTimeBetween('-3 days', '+10 days'),
            'venue'        => $this->faker->city() . ' Stadium',
            'status_id'    => GameStatus::query()->inRandomOrder()->value('id') ?? GameStatus::factory(),
            'home_score'   => $this->faker->numberBetween(0, 5),
            'away_score'   => $this->faker->numberBetween(0, 5),
            'round'        => $this->faker->numberBetween(1, 20),
            'stage'        => $this->faker->optional()->randomElement(['Group', 'Quarterfinal', 'Semifinal', 'Final']),
        ];
    }
}
