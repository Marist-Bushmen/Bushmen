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

# @never_cache
class Quotes(TemplateView):
    # Get all Quotes from the DB
    view_args = {
        'quotes': getQuotes(),
    }

    def get(self, request):
        search = SearchForm()
        self.view_args['search'] = search
        self.view_args['quotes'] = getQuotes()
        return render(request, 'bushmen/quotes.html', self.view_args)

    def post(self, request):
        self.view_args['quotes'] = getQuotes()
        if 'delete' in request.POST:
            qid = request.POST.get('qid', '')
            self.view_args['err'] = deleteQuote(qid)
            self.view_args['quotes'] = getQuotes()
            return HttpResponsePermanentRedirect('quotes')
            # return render(request, 'bushmen/quotes.html', self.view_args)

        search = SearchForm(request.POST)
        self.view_args['search'] = search
        if search.is_valid():
            query = search.cleaned_data['query']
            self.view_args['quotes'] = searchQuotes(query)

        return render(request, 'bushmen/quotes.html', self.view_args)
            
# @never_cache
class AddQuote(TemplateView):
    view_args = {}

    def get(self, request):
        search = SearchForm()
        self.view_args['search'] = search
        addQuote = AddQuoteForm()
        self.view_args['AddQuote'] = addQuote
        return render(request, 'bushmen/AddQuote.html', self.view_args)

    def post(self, request):
        search = SearchForm(request.POST)
        self.view_args['search'] = search
        if search.is_valid():
            query = search.cleaned_data['query']
            self.view_args['quotes'] = searchQuotes(query)
            return render(request, 'bushmen/quotes.html', self.view_args)

        addQuote = AddQuoteForm(request.POST)
        self.view_args['AddQuote'] = addQuote
        if addQuote.is_valid():
            name = addQuote.cleaned_data['name']
            quote = addQuote.cleaned_data['quote']
            context = addQuote.cleaned_data['context']
            date = addQuote.cleaned_data['date']
            self.view_args['err'] = createQuote(name, quote, context, date)
        return render(request, 'bushmen/AddQuote.html', self.view_args)


