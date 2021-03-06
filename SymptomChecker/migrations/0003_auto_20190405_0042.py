# Generated by Django 2.1.7 on 2019-04-04 19:12

from django.db import migrations
import multiselectfield.db.fields


class Migration(migrations.Migration):

    dependencies = [
        ('symptomChecker', '0002_auto_20190404_0131'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='symptomsmodel',
            name='body_parts',
        ),
        migrations.AddField(
            model_name='bodypart',
            name='earSymptoms',
            field=multiselectfield.db.fields.MultiSelectField(choices=[('hallucinations auditory', 'hallucinations auditory'), ('verbal auditory hallucinations', 'verbal auditory hallucinations'), ('hyperacusis', 'hyperacusis'), ('tinnitus', 'tinnitus')], default='tinnitus', max_length=50),
        ),
        migrations.AddField(
            model_name='bodypart',
            name='generalSymptoms',
            field=multiselectfield.db.fields.MultiSelectField(choices=[('asthenia', 'asthenia'), ('sweat', 'sweat'), ('fever', 'fever'), ('chills', 'chills'), ('malaise', 'malaise'), ('infection', 'infection'), ('fatigue', 'fatigue')], default='fever', max_length=50),
        ),
        migrations.AddField(
            model_name='bodypart',
            name='headSymptoms',
            field=multiselectfield.db.fields.MultiSelectField(choices=[('dizziness', 'dizziness'), ('vertigo', 'vertigo'), ('fall', 'fall'), ('unresponsiveness', 'unresponsiveness'), ('weepiness', 'weepiness')], default='fall', max_length=50),
        ),
        migrations.DeleteModel(
            name='SymptomsModel',
        ),
    ]
