# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from django import forms

class SearchForm(forms.Form):
    query = forms.CharField(max_length=100)

class AddQuoteForm(forms.Form):
    name = forms.CharField(max_length=100)
    quote = forms.CharField(max_length=100)
    context = forms.CharField(max_length=100, required=False)
    # date = 