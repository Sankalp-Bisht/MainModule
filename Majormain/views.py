from django.http import HttpResponse
from django.shortcuts import render, redirect
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth import login


def home(request):
    return render(request, 'home.html')

def userregistration(request):

    if request.method == 'POST':
        form = UserCreationForm(request.POST)
        if form.is_valid():
            user = form.save()
            login(request, user)
            return render(request, 'home.html' ,{'user':user})
    else:
        form = UserCreationForm()

    return render(request,"userregister.html",{'form': form})

def login_view(request):
    if request.method == 'POST':
        form = AuthenticationForm(data=request.POST)
        if form.is_valid():
            user = form.get_user()
            login(request, user)
            return render(request, 'home.html',{'user':user})
    else:
        form = AuthenticationForm()
    return render(request, 'login.html', {'form': form})