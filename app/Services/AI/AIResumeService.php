<?php

namespace App\Services\AI;

use App\Contracts\AI\AIProviderInterface;
use App\Models\Resume;
use Illuminate\Support\Carbon;

class AIResumeService
{
    public function __construct(
        private readonly AIProviderInterface $provider,
    ) {}

    public function generateSummary(Resume $resume): string
    {
        $resume->loadMissing([
            'user',
            'experiences',
            'educations',
            'skills',
            'languages',
            'projects',
            'certifications',
        ]);

        $prompt = $this->buildPrompt($resume);
        $summary = $this->provider->generate($prompt);

        $resume->update([
            'summary' => $summary,
            'summary_generated_at' => Carbon::now(),
        ]);

        return $summary;
    }

    private function buildPrompt(Resume $resume): string
    {
        $lines = [];

        $lines[] = "Generate a professional resume summary for the following candidate. Write 3 to 5 sentences in the first person. Be specific, compelling, and highlight key strengths. Output only the summary text with no headers, labels, or additional formatting.";
        $lines[] = "";
        $lines[] = "CANDIDATE: {$resume->user->name}";
        $lines[] = "RESUME TITLE: {$resume->title}";

        if ($resume->experiences->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "WORK EXPERIENCE:";
            foreach ($resume->experiences as $experience) {
                $end = $experience->end_date?->format('Y-m') ?? 'Present';
                $start = $experience->start_date->format('Y-m');
                $lines[] = "- {$experience->title} at {$experience->company_name} ({$start} - {$end}) [{$experience->employment_type->value}]";
                if ($experience->description) {
                    $lines[] = "  {$experience->description}";
                }
            }
        }

        if ($resume->educations->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "EDUCATION:";
            foreach ($resume->educations as $education) {
                $end = $education->end_date?->format('Y') ?? 'Present';
                $field = $education->field_of_study ? " in {$education->field_of_study}" : '';
                $lines[] = "- {$education->degree}{$field} at {$education->institution_name} ({$education->start_date->format('Y')} - {$end}) [{$education->degree_type->value}]";
            }
        }

        if ($resume->skills->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "SKILLS:";
            foreach ($resume->skills as $skill) {
                $lines[] = "- {$skill->name} (proficiency: {$skill->proficiency_level}/5)";
            }
        }

        if ($resume->languages->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "LANGUAGES:";
            foreach ($resume->languages as $language) {
                $lines[] = "- {$language->name} ({$language->proficiency_level->value})";
            }
        }

        if ($resume->projects->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "PROJECTS:";
            foreach ($resume->projects as $project) {
                $role = $project->role ? " — Role: {$project->role}" : '';
                $lines[] = "- {$project->name}{$role}";
                if ($project->description) {
                    $lines[] = "  {$project->description}";
                }
                if (!empty($project->technologies)) {
                    $lines[] = "  Technologies: " . implode(', ', $project->technologies);
                }
            }
        }

        if ($resume->certifications->isNotEmpty()) {
            $lines[] = "";
            $lines[] = "CERTIFICATIONS:";
            foreach ($resume->certifications as $certification) {
                $lines[] = "- {$certification->name} from {$certification->issuing_organization} ({$certification->issue_date->format('Y-m')})";
            }
        }

        return implode("\n", $lines);
    }
}