from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='symptomChecker'),
    path('bodypart', views.bodypart, name='bodypart'),
    path('symptom', views.symptom, name='symptom'),
    path('displayDiseases', views.displayDiseases, name='displayDiseases'),
    path('search', views.search,name='search')
]
