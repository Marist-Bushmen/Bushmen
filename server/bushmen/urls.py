# All urls to be handeled by the dashboard app
from django.views.decorators.cache import never_cache
from django.conf.urls import url
from . import views

urlpatterns = [
    url(r'^$', views.Index.as_view(),name='index'),
    url(r'^quotes/add/', views.AddQuote.as_view(), name='add quotes'),
    url(r'^quotes/', never_cache(views.Quotes.as_view()), name='quotes'),
   
]