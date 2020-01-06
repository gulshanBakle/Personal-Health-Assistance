from django.views.generic import TemplateView, FormView
from django.shortcuts import render, render_to_response, redirect
from django.shortcuts import HttpResponse
from .forms import BodyPartForm, SymptomForm
from django.template import loader
from .models import BodyPart,Symptom, Search
import json,requests
from django.http import HttpResponseRedirect, JsonResponse
from django.db.models import Q

from sklearn.externals import joblib
import numpy as np
import pandas as pd

def index(request):
    return render(request,'symptomChecker/symptomChecker.html')


def bodypart(request):
    template_name='symptomChecker/bodyPart.html'

    if request.method=='POST':
        bodypart_form = BodyPartForm(request.POST)
        if bodypart_form.is_valid():
            name_r=request.POST.get('name')
            bodypart_r= request.POST.get('the_choices')
            bodypart_form.save()
            template=loader.get_template('symptomChecker/symptoms.html')
            return redirect('symptom')
    else:
        bodypart_form=BodyPartForm()
    return render(request,'symptomChecker/bodyPart.html',{'bodypart_form':bodypart_form})
def symptom(request):

    template_name = 'symptomChecker/symptoms.html'
    success_url = '/'

    if request.method=='POST':
        symptom_form = SymptomForm(request.POST)
        if symptom_form.is_valid():
            enterSymptoms_r=request.POST.get('enterSymptoms')
            symptom_form.save()

            return redirect('displayDiseases')
    else:
        symptom_form=SymptomForm()
    return render(request,'symptomChecker/symptoms.html',{'symptom_form':symptom_form})
def displayDiseases(request):


    obj=Symptom.objects.all()
    l=len(obj)-1
    s=obj[l]
    clf = joblib.load('symptomChecker/RandomForestFinal.pkl')
    x=pd.read_pickle('symptomChecker/symptom_list_final')
    y=pd.read_pickle('symptomChecker/disease_list_final')
    test_symptoms = s.enterSymptoms.split(';')
    sym_list = list(x)
    # print(len(sym_list))
    test_data = np.zeros(len(sym_list))
    # print(sym_list)
    flag = 0
    for i in test_symptoms:
        print(i)
        try:
            ind = sym_list.index(" ".join(i.strip(' ').split()))
            print(ind)
            test_data[ind] = 1
            flag += 1
        except ValueError:
            pass
    # print(test_data)
    tdf = pd.DataFrame([test_data], columns=sym_list).astype(int)
    # print(tdf.head())
    # print(flag)
    # print(test_data)
    # print(flag, "value(s) accepted")
    print(clf.predict(tdf))
    out = clf.predict_proba(tdf)
    # print(out)
    out1 = out.tolist()
    out_list = out1[0]
    dis_list = list(y)
    final_dis_list=[]
    final_dis_prob_list=[]
    print(out_list)
    for i in range(len(out_list)):
        if not out_list[i] == 0:
            final_dis_list.append(dis_list[i])
            final_dis_prob_list.append(((out_list[i]) * 100))
            print(dis_list[i], "\t", out_list[i] * 100)
    display=zip(final_dis_list,final_dis_prob_list)
    z=sorted(display, key = lambda x: x[1], reverse=True)
    return render(request, 'symptomChecker/displayDiseases.html',{'z': z })



def search(request):
    if request.method == 'GET':
        query = request.GET.get('q')
        submitbutton = request.GET.get('submit')
        if query is not None:
            lookups = Q(brandName__icontains=query)
            results = Search.objects.filter(lookups).distinct()
            context = {'results': results,
                       'submitbutton': submitbutton}
            return render(request, 'symptomChecker/priceComparator.html', context)
        else:
            return render(request, 'symptomChecker/priceComparator.html')
    else:
        return render(request, 'symptomChecker/priceComparator.html')
