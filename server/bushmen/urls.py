# All urls to be handeled by the dashboard app
from django.conf.urls import url
from . import views

urlpatterns = [
    url(r'^$', views.Index.as_view(), name='index'),
    url(r'^quotes', views.Quotes.as_view(), name='quotes'),
    url(r'^add/quotes', views.AddQuote.as_view(), name='add quotes'),
]