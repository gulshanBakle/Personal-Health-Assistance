# Generated by Django 2.1.7 on 2019-04-05 22:14

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('symptomChecker', '0004_auto_20190406_0140'),
    ]

    operations = [
        migrations.AlterField(
            model_name='symptom',
            name='name',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='symptomChecker.BodyPart'),
        ),
    ]
