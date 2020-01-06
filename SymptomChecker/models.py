from django.db import models
from multiselectfield import MultiSelectField




class BodyPart(models.Model):


    General_symptoms='a'
    Head='b'
    Eyes='c'
    Ears='d'
    Nose='e'
    Legs='l'
    CHOICES=(("General_symptoms","General symptoms"),("Head","Head"),("Ear","Ear"),("Eyes","Eyes"),("Nose","Nose"),('Legs',"Legs"))
    name=models.CharField(max_length=300,default='Hello')
    the_choices= MultiSelectField(choices=CHOICES, min_choices=1)

    def __str__(self):
        return self.name


class Symptom(models.Model):
    GeneralSymptoms = (
        ('asthenia', 'asthenia'), ('sweat', 'sweat'), ('fever', 'fever'), ('chills', 'chills'), ('malaise', 'malaise'),
        ('infection', 'infection'), ('fatigue', 'fatigue'))
    HeadSymptoms = (
        ('dizziness', 'dizziness'), ('vertigo', 'vertigo'), ('fall', 'fall'), ('unresponsiveness', 'unresponsiveness'),
        ('weepiness', 'weepiness'))
    EarSymptoms = (('hallucinations auditory', 'hallucinations auditory'),
                   ('verbal auditory hallucinations', 'verbal auditory hallucinations'), ('hyperacusis', 'hyperacusis'),
                   ('tinnitus', 'tinnitus'))
    name=models.ForeignKey(BodyPart,on_delete=models.CASCADE,null=True)
    enterSymptoms = models.TextField(max_length=1000,default='Enter Your symptoms separated by ;')
    def __str__(self):
        return str(self.name)

class Search(models.Model):
    brandName=models.CharField(max_length=50)
    genericName=models.CharField(max_length=50)
    genericPrice=models.IntegerField(default=0)

    def __str__(self):
        return self.brandName