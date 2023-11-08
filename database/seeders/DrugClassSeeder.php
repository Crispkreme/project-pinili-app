<?php

namespace Database\Seeders;

use App\Models\DrugClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => '',
            'name' => 'N/A',
            'description' => 'N/A',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-06283253',
            'name' => 'Tablet',
            'description' => 'Tablet',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28032539',
            'name' => 'Liquid',
            'description' => 'Liquid',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-24732539',
            'name' => 'Capsules',
            'description' => 'Capsules',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28064539',
            'name' => 'Drops',
            'description' => 'Drops',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28742539',
            'name' => 'Inhalers',
            'description' => 'Inhalers',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28302539',
            'name' => 'Injections',
            'description' => 'Injections',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28962539',
            'name' => 'Implants',
            'description' => 'Implants',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28632539',
            'name' => 'Chewable Tablets',
            'description' => 'Chewable Tablets',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28037439',
            'name' => 'Softgels',
            'description' => 'Softgels',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28772539',
            'name' => 'Granules',
            'description' => 'Granules',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28074539',
            'name' => 'Powders',
            'description' => 'Powders',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28842539',
            'name' => 'Cream',
            'description' => 'Cream',
        ]);
        DrugClass::create([
            'classification_id' => 2,
            'id_number' => 'DRG-28212539',
            'name' => 'Ointment',
            'description' => 'Ointment',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-03253939',
            'name' => 'Analgesics',
            'description' => 'Drugs that relieve pain',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antacids',
            'description' => 'Drugs that relieve indigestion and heartburn by neutralizing stomach acid.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antianxiety Drugs',
            'description' => 'Drugs that suppress anxiety and relax muscles.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antiarrhythmics',
            'description' => 'Drugs used to control irregularities of heartbeat.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antibacterials',
            'description' => 'Drugs used to treat infections.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antibiotics',
            'description' => 'Drugs made from naturally occurring and synthetic substances that combat bacterial infection.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Anticoagulants',
            'description' => 'Drugs prevent blood from clotting.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Thrombolytics',
            'description' => 'Drugs help dissolve and disperse blood clots.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Anticonvulsants',
            'description' => 'Drugs that prevent epileptic seizures.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antidepressants',
            'description' => 'Drugs  can help relieve symptoms of conditions such as depression and anxiety disorders.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antidiarrheals',
            'description' => 'Drugs used for the relief of diarrhea.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antiemetics',
            'description' => 'Drugs used to treat nausea and vomiting.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antifungals',
            'description' => 'Drugs used to treat fungal infections.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antihistamines',
            'description' => 'Drugs used primarily to counteract the effects of histamine.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antihypertensives',
            'description' => 'Drugs that lower blood pressure.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Anti-Inflammatories',
            'description' => 'Drugs used to reduce inflammation',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antineoplastics',
            'description' => 'Drugs used to treat cancer.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antipsychotics',
            'description' => 'Drugs used to treat symptoms of severe psychiatric disorders.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antipyretics',
            'description' => 'Drugs that reduce fever.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antivirals',
            'description' => 'Drugs used to treat viral infections',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Barbiturates',
            'description' => 'Sleeping drugs',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Beta-Blockers',
            'description' => 'Drugs used to reduce the oxygen needs of the heart by reducing heartbeat rate.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Bronchodilators',
            'description' => 'Drugs used to ease breathing in diseases such as asthma.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Cold Cures',
            'description' => '',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Corticosteroids',
            'description' => 'Drugs used for treating some malignancies or compensating for a deficiency of natural hormones in disorders',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Cough Suppressants',
            'description' => 'Drugs used for stopping the urge to cough.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Cytotoxics',
            'description' => 'Drugs that kill or damage cells',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Decongestants',
            'description' => 'Drugs that reduce swelling of the mucous membranes that line the nose by constricting blood vessels.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Diuretics',
            'description' => 'Drugs used for treating mild cases of high blood pressure.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Expectorant',
            'description' => 'Drugs that stimulates the flow of saliva and promotes coughing to eliminate phlegm from the respiratory tract',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Hormones',
            'description' => 'Drugs used for hormone replacement therapy.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Hypoglycemics (Oral)',
            'description' => 'Drugs that lower the level of glucose in the blood.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Immunosuppressives',
            'description' => 'Drugs that prevent or reduce the bodys normal reaction to invasion by disease or by foreign tissues.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Laxatives',
            'description' => 'Drugs that increase the frequency and ease of bowel movements.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Muscle Relaxants',
            'description' => 'Drugs that relieve muscle spasm in disorders such as backache.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Sedatives',
            'description' => 'Antianxiety drugs.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Sex Hormones (Female)',
            'description' => 'Drugs used to treat menstrual and menopausal disorders.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Sex Hormones (Male)',
            'description' => 'Drugs used to compensate for hormonal deficiency in hypopituitarism or disorders of the testes.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Sleeping Drugs',
            'description' => 'A drug and especially a barbiturate that is taken as a tablet or capsule to induce sleep',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Tranquilizer',
            'description' => 'Drugs used to reduce mental disturbance.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Vitamins',
            'description' => 'Are substances that our bodies need to develop and function normally.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Mucolytic',
            'description' => 'A mucolytic is any agent which dissolves thick mucus, used to help relieve breathing difficulties.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antiprotozoal',
            'description' => 'Medication used to treat infections caused by protozoa, which are single cell organisms that belong to the type of parasites.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antispasmodic',
            'description' => 'A medication that relieves, prevents, or lowers the incidence of muscle spasms, especially those of smooth muscle such as in the bowel wall.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antiasthma',
            'description' => 'Relieving or counteracting the symptoms of asthma. anti-asthma drugs.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antitussive',
            'description' => 'Used to treat coughs and congestion caused by the common cold, bronchitis, and other breathing illnesses.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Corticosteroid',
            'description' => 'Are a class of steroid hormones that are produced in the adrenal cortex of vertebrates, as well as the synthetic analogues of these hormones.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antidiabetic',
            'description' => 'Used in diabetes treat diabetes mellitus by altering the glucose level in the blood.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Inhibitor',
            'description' => 'A substance that binds to an enzyme and decreases the enzymes activity',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antivertigo',
            'description' => 'Used to prevent or relieve the symptoms of vertigo',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antimotility',
            'description' => 'Contain an antimotility agent that relieves the symptoms of diarrhea by slowing intestinal movement.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antigout',
            'description' => 'Agents are medications prescribed for the treatment of gout, a painful arthritic condition caused by excessive uric acid in the blood that gets deposited as monosodium urate crystals in joints.',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antifibrinolytic',
            'description' => 'Are drugs that act by inhibiting the process that dissolves clots, thereby reducing bleeding',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Antithrombotic',
            'description' => 'Any drug that prevents or interferes with the formation of thrombi',
        ]);
        DrugClass::create([
            'classification_id' => 1,
            'id_number' => 'DRG-00325399',
            'name' => 'Anticholinergic',
            'description' => 'Drugs that block the action of acetylcholine . Acetylcholine is a neurotransmitter, or a chemical messenger.',
        ]);
    }
}
