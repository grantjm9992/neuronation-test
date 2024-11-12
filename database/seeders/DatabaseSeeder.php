<?php

namespace Database\Seeders;

use App\Domain\Models\Course;
use App\Domain\Models\Exercise;
use App\Domain\Models\Score;
use App\Domain\Models\Session;
use App\Domain\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function run(): void
    {
        $course = Course::create(['name' => 'Sample Course']);
        $category = DB::table('domain_categories')->insertGetId(['name' => 'Sample Category']);

        $exercises = collect([
            Exercise::create(['course_id' => $course->course_id, 'category_id' => $category, 'name' => 'Exercise 1', 'points' => 100]),
            Exercise::create(['course_id' => $course->course_id, 'category_id' => $category, 'name' => 'Exercise 2', 'points' => 80]),
            Exercise::create(['course_id' => $course->course_id, 'category_id' => $category, 'name' => 'Exercise 3', 'points' => 90]),
        ]);

        $maxPoints = $exercises->sum('points');

        $users = User::factory()->count(2)->create();

        foreach ($users as $user) {
            $this->logger->info('Seeded user email : ' . $user->email);
            for ($i = 1; $i <= 12; $i++) {

                $session = Session::create([
                    'course_id' => $course->course_id,
                    'user_id' => $user->user_id,
                    'timestamp' => now()->subDays(12 - $i),
                ]);

                $sessionScore = 0;

                foreach ($exercises as $exercise) {
                    // Generate a random score below the max points of the exercise
                    $score = rand(1, $exercise->points - 1);

                    // Add the score to the session's total
                    $sessionScore += $score;

                    // Create a score record
                    Score::create([
                        'session_id' => $session->session_id,
                        'exercise_id' => $exercise->exercise_id,
                        'points_scored' => $score,
                        'start_difficulty' => rand(1, 5),
                        'end_difficulty' => rand(1, 5),
                    ]);
                }

                // Update session's total score and normalized score
                $session->update([
                    'score' => $sessionScore,
                    'normalized_score' => round(($sessionScore / $maxPoints) * 100, 2) . '%',
                ]);
            }
        }
    }
}
