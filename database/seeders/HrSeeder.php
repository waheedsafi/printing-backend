<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Carbon\Carbon;
use App\Models\HireType;
use App\Models\PaymentType;
use App\Models\HireTypeTran;
use App\Models\DeductionType;
use Illuminate\Database\Seeder;
use App\Models\PaymentTypeTrans;
use App\Models\DeductionTypeTrans;
use App\Models\PositionChangeType;
use App\Models\AttendanceTimeTable;
use App\Enums\Types\PaymentTypeEnum;
use App\Enums\Types\DeductionTypeEnum;
use App\Enums\Types\PayPeriodsTypeEnum;
use App\Models\PayPeriod;
use App\Models\PayPeriodTran;
use App\Models\PositionChangeTypeTran;
use App\Models\SalaryTaxRange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->hireType();
        $this->positionChangeType();
        $this->paymentType();
        $this->deductionType();
        $this->payPeriodsType();
        $this->tax();
    }

    protected function tax()
    {

        SalaryTaxRange::create([
            'start' => 0,
            'end' => 5000,
            'fixed_tax' => null,
            'percentage_tax' => null,
            'is_active' => true
        ]);
        SalaryTaxRange::create([
            'start' => 5000,
            'end' => 12500,
            'fixed_tax' => 150,
            'percentage_tax' => null,
            'is_active' => true
        ]);
        SalaryTaxRange::create([
            'start' => 12500,
            'end' => 100000,
            'fixed_tax' => null,
            'percentage_tax' => 10,
            'is_active' => true
        ]);
        SalaryTaxRange::create([
            'start' => 100000,
            'end' => 1000000,
            'fixed_tax' => null,
            'percentage_tax' => 20,
            'is_active' => true
        ]);
    }
    protected function deductionType()
    {
        $item = DeductionType::factory()->create([
            'id' => DeductionTypeEnum::income_tax->value
        ]);
        DeductionTypeTrans::factory()->create([
            "value" => "Income tax",
            "deduction_type_id" => $item->id,
            "language_name" => "en",
        ]);
        DeductionTypeTrans::factory()->create([
            "value" => "مالیه",
            "deduction_type_id" => $item->id,
            "language_name" => "fa",
        ]);
        DeductionTypeTrans::factory()->create([
            "value" => "مالیه",
            "deduction_type_id" => $item->id,
            "language_name" => "ps",
        ]);
    }
    protected function paymentType()
    {
        $item = PaymentType::factory()->create([
            'id' => PaymentTypeEnum::partial_payment->value,
            'detail' => 'In-between payment (not necessarily early)',
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "Partial payment",
            "payment_type_id" => $item->id,
            "language_name" => "en",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "پرداخت جزئی",
            "payment_type_id" => $item->id,
            "language_name" => "fa",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "جزوي تادیه",
            "payment_type_id" => $item->id,
            "language_name" => "ps",
        ]);
        $item = PaymentType::factory()->create([
            'id' => PaymentTypeEnum::final_payment->value,
            'detail' => 'Closing payment for the month',
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "Final payment",
            "payment_type_id" => $item->id,
            "language_name" => "en",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "پرداخت نهایی",
            "payment_type_id" => $item->id,
            "language_name" => "fa",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "وروستۍ تادیه",
            "payment_type_id" => $item->id,
            "language_name" => "ps",
        ]);
        $item = PaymentType::factory()->create([
            'id' => PaymentTypeEnum::full_payment->value,
            'detail' => 'Single full salary paid in one go',
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "Full payment",
            "payment_type_id" => $item->id,
            "language_name" => "en",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "پرداخت کامل",
            "payment_type_id" => $item->id,
            "language_name" => "fa",
        ]);
        PaymentTypeTrans::factory()->create([
            "value" => "بشپړ تادیه",
            "payment_type_id" => $item->id,
            "language_name" => "ps",
        ]);
    }

    protected function payPeriodsType()
    {
        $item = PayPeriod::factory()->create([
            'id' => PayPeriodsTypeEnum::monthly->value,
        ]);
        PayPeriodTran::factory()->create([
            "value" => "Monthly",
            "pay_period_id" => $item->id,
            "language_name" => "en",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "ماهانه",
            "pay_period_id" => $item->id,
            "language_name" => "fa",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "میاشتنی",
            "pay_period_id" => $item->id,
            "language_name" => "ps",
        ]);

        $item = PayPeriod::factory()->create([
            'id' => PayPeriodsTypeEnum::weekly->value,
        ]);
        PayPeriodTran::factory()->create([
            "value" => "Weekly",
            "pay_period_id" => $item->id,
            "language_name" => "en",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "هفته وار",
            "pay_period_id" => $item->id,
            "language_name" => "fa",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "اونی وار",
            "pay_period_id" => $item->id,
            "language_name" => "ps",
        ]);
        $item = PayPeriod::factory()->create([
            'id' => PayPeriodsTypeEnum::biweekly->value,
        ]);
        PayPeriodTran::factory()->create([
            "value" => "Biweekly",
            "pay_period_id" => $item->id,
            "language_name" => "en",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "دوهفتی",
            "pay_period_id" => $item->id,
            "language_name" => "fa",
        ]);
        PayPeriodTran::factory()->create([
            "value" => "دوه اونی",
            "pay_period_id" => $item->id,
            "language_name" => "ps",
        ]);
    }

    protected function hireType()
    {
        $hireTypes = [
            [
                'detail' => '',
                'translations' => [
                    'en' => 'Contractual',
                    'ps' => 'قراردادي',
                    'fa' => 'قراردادی',
                ]
            ],
            [
                'detail' => '',
                'translations' => [
                    'en' => 'Permanent',
                    'ps' => 'دائمی',
                    'fa' => 'دایمي',
                ]
            ],
            [
                'detail' => '',
                'translations' => [
                    'en' => 'Temporary',
                    'ps' => 'موقتی',
                    'fa' => 'لنډمهاله',
                ]
            ],
            [
                'detail' => '',
                'translations' => [
                    'en' => 'Internship',
                    'ps' => 'موقتی',
                    'fa' => 'کارآموزی',
                ]
            ]
        ];

        foreach ($hireTypes as $typeData) {
            $hireType = HireType::create([
                'detail' => $typeData['detail'],
            ]);

            foreach ($typeData['translations'] as $lang => $value) {
                HireTypeTran::create([
                    'hire_type_id' => $hireType->id,
                    'language_name' => $lang,
                    'value' => $value,
                ]);
            }
        }
    }

    protected function  positionChangeType()
    {
        // First, create an array of position change types and their corresponding translations
        $positionChangeTypes = [
            'promotion' => [
                'en' => 'Promotion',
                'fa' => 'ارتقا', // Promotion in Farsi
                'ps' => 'ارتقا'  // Promotion in Pashto
            ],
            'demotion' => [
                'en' => 'Demotion',
                'fa' => 'تنزل', // Demotion in Farsi
                'ps' => 'تنزل'  // Demotion in Pashto
            ],
        ];

        // Loop through the array to create PositionChangeTypes and their translations
        foreach ($positionChangeTypes as $type => $translations) {
            // Create the PositionChangeType
            $post = PositionChangeType::create();

            // Loop through the translations array and create the PositionChangeTypeTran for each language
            foreach ($translations as $language => $value) {
                PositionChangeTypeTran::create([
                    'position_change_type_id' => $post->id,
                    'language_name' => $language,
                    'value' => $value
                ]);
            }
        }
    }
}
