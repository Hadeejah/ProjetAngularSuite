import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';
import { CategoriesComponent } from './categories/categories.component';
import { ArticleComponent } from './article/article.component';
import { ArticleVenteComponent } from './article-vente/article-vente.component';

const routes: Routes = [
  { path: "categorie", component: CategoriesComponent },
  { path: "articles", component: ArticleComponent },
  {path:"articlesVente",component:ArticleVenteComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes),
    ReactiveFormsModule
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
