<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Demographique
 *
 * @property int $id
 * @property int $population_total
 * @property int $fille_total
 * @property int $homme_total
 * @property int $taux_maurtalite
 * @property int $taux_migrant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique query()
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereFilleTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereHommeTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique wherePopulationTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereTauxMaurtalite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereTauxMigrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demographique whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDemographique {}
}

namespace App\Models{
/**
 * App\Models\Migrant
 *
 * @property int $id
 * @property int $region_id
 * @property string $nom_prnom
 * @property string $natinalite
 * @property string $date_naissance
 * @property string $sexe
 * @property string $adresse
 * @property string $contact
 * @property string $statut_migratoire
 * @property string $situation_familiale
 * @property string $date_arrivee
 * @property string $durree_prevue_sejour
 * @property string $competences_migrant
 * @property string $niveau_education
 * @property string $besoin_specifique_migrant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Region|null $regions
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereBesoinSpecifiqueMigrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereCompetencesMigrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereDateArrivee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereDateNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereDurreePrevueSejour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereNatinalite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereNiveauEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereNomPrnom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereSituationFamiliale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereStatutMigratoire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Migrant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMigrant {}
}

namespace App\Models{
/**
 * App\Models\PSH
 *
 * @property int $id
 * @property string $nom
 * @property string $emplacement
 * @property string $capacite
 * @property string $service_dispo
 * @property string $contact
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PSH newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PSH newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PSH query()
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereCapacite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereEmplacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereServiceDispo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PSH whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperPSH {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property int $id
 * @property string $nom
 * @property string $longitude
 * @property string $latitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Migrant> $migrants
 * @property-read int|null $migrants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRegion {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

