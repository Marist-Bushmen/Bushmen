# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from django.http import HttpResponsePermanentRedirect
from django.views.generic import TemplateView
from django.shortcuts import render, redirect
from .db_helper import *
from .forms import *
# import requests
import json
import os

class Index(TemplateView):
    def get(self, request):
        return HttpResponsePermanentRedirect('quotes')

class Quotes(TemplateView):

    # Get all Quotes from the DB
    view_args = {
        'quotes': getQuotes(),
    }

    search = SearchForm()
    view_args['search'] = search
    if search.is_valid():
        query = search.cleaned_data['query']

    def get(self, request):
        return render(request, 'bushmen/quotes.html', self.view_args)
    def post(self, request):
        return render(request, 'bushmen/quotes.html', self.view_args)
            

class AddQuote(TemplateView):
    # addQuote = AddQuoteForm()

    view_args = {

    }

    def get(self, request):
            return render(request, 'bushmen/AddQuote.html')