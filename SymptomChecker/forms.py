from django import forms
from django.forms import ModelForm
from .models import BodyPart,Symptom
class BodyPartForm(forms.ModelForm):
    name=forms.CharField(widget=forms.TextInput(
        attrs={
            'class':'form-control',
            'placeholder':'Enter your name'
        }))
    the_choices = forms.MultipleChoiceField
    class Meta:
        model = BodyPart
        fields = ['name','the_choices']



class SymptomForm(forms.ModelForm):
    enterSymptoms= forms.CharField(widget=forms.TextInput(
        attrs={
            'class':'form-control',
            'placeholder':'Enter your symptoms'
        }
    ))
    class Meta:
        model = Symptom
        fields=['enterSymptoms']

