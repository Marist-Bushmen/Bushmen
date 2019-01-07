# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from django import forms

class SearchForm(forms.Form):
    query = forms.CharField(max_length=100, widget=forms.TextInput(
        attrs = {
            'class': 'form-control mr-sm-2',
            'placeholder':'Search'
        }
    ))
class AddQuoteForm(forms.Form):
    name = forms.CharField(max_length=100, widget=forms.TextInput(
        attrs = {
            'class': 'form-control',
            'placeholder':'Authors Name'
        }
    ))
    quote = forms.CharField(widget=forms.TextInput(
        attrs = {
            'class': 'form-control',
            'placeholder':'What they said...'
        }
    ))
    context = forms.CharField(max_length=100, required=False, widget=forms.TextInput(
        attrs = {
            'class': 'form-control',
            'placeholder':'Contenxt(Optional)'
        }
    ))

    date = forms.CharField(max_length=100, widget=forms.TextInput(
        attrs = {
            'class': 'form-control',
            'type': 'date'
        }
    ))