<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntensityRating extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'category', 'rating'];

    public const CATEGORIES = [
        'occult_satanic' => 'Occult/Satanic Themes',
        'animal_cruelty' => 'Animal Cruelty',
        'self_harm' => 'Self-Harm',
        'graphic_medical' => 'Graphic Medical Procedures',
        'domestic_violence' => 'Domestic Violence',
        'flashing_lights' => 'Flashing Lights',
        'sexual_situations' => 'Sexual Situations',
        'suicidal_themes' => 'Suicidal Themes',
        'drug_use' => 'Drug Use',
        'adults_as_teens' => 'Adults Posing as Teenagers',
        'teen_sex' => 'Teen Sex',
        'gay_themes' => 'Gay Themes & Characters',
        'trans_themes' => 'Trans Themes & Characters',
        'gay_themes_gratuitous' => 'Gay Themes & Characters (Not Part of Main Story)',
        'trans_themes_gratuitous' => 'Trans Themes & Characters (Not Part of Main Story)',
        'interracial_romance' => 'Interracial Romance',
        'psychological_dread' => 'Psychological Dread',
        'gore_body_horror' => 'Gore & Body Horror',
        'political_intrigue' => 'Political Intrigue',
        'class_warfare' => 'Class Warfare (Rich vs. Poor)',
        'religious_themes' => 'Religious Themes',
        'existential_crisis' => 'Existential Crisis',
        'nazi_extreme_ideologies' => 'Nazi Idolatry / Extreme Ideologies',
        'technological_paranoia' => 'Technological Paranoia',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
