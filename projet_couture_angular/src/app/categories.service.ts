import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CategoriesService {

  constructor(private http:HttpClient) { }
  getCateg(page:number){
    return this.http.get(`http://127.0.0.1:8000/api/listCategorie?page=${page}`);
  }
  addCateg(categorie:any){
    return this.http.post(`http://127.0.0.1:8000/api/addCategorie`,categorie);
  }
  deleteCateg(idCateg:number){
    return this.http.delete(`http://127.0.0.1:8000/api/deleteCateg/`+ idCateg)
  }
  modifCateg(idC:number){
    return this.http.get(`http://127.0.0.1:8000/api/modifCateg/`+ idC)
  }
}
