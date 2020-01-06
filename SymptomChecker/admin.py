from django.contrib import admin
from .models import BodyPart,Symptom,Search
# Register your models here.
admin.site.register(BodyPart)
admin.site.register(Symptom)
admin.site.register(Search)