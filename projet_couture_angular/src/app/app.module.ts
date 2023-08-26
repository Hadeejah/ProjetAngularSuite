import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CategoriesComponent } from './categories/categories.component';
import {HttpClientModule} from '@angular/common/http';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { NgxPaginationModule } from 'ngx-pagination';
import { FormsModule } from '@angular/forms';
import { ArticleComponent } from './article/article.component';
import { ListeComponent } from './article/liste/liste.component';
import { PaginationComponent } from './article/pagination/pagination.component';
import { ItemComponent } from './article/liste/item/item.component';
import { FormComponent } from './article/form/form.component';
import { ArticleVenteComponent } from './article-vente/article-vente.component';




@NgModule({
  declarations: [
    AppComponent,
    CategoriesComponent,
    NavBarComponent,
    ArticleComponent,
    ListeComponent,
    PaginationComponent,
    ItemComponent,
    FormComponent,
    ArticleVenteComponent,
   

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    NgxPaginationModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
