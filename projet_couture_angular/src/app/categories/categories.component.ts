import { CategoriesService } from './../categories.service';
import { Component, ElementRef, ViewChild, ViewChildren } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { filter } from 'rxjs';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.css'],
})
export class CategoriesComponent {
  itemsPerPage: number = 0;
  currentPage: number = 1;
  totalItems: number = 0;
  @ViewChild("checkAll") checkAll!: ElementRef;
  // @ViewChild("checkOne") checkOne!:ElementRef;
  



  lib: string = '';
  exist = false;
  boolean = false;
  delete: boolean = true;
  checkbox: boolean = true;
  checked: boolean = true;
  checkOne: boolean = false;
  selectAllChecked: boolean = false;

  libExist = false;
  categories: any[] = [];

  constructor(private categService: CategoriesService) {
    this.getCateg(this.currentPage);
  }

  getCateg(numberPage: any) {
    this.categService.getCateg(numberPage).subscribe((dataCateg: any) => {
      this.categories = dataCateg.data;
      this.itemsPerPage = dataCateg.per_page;
      this.totalItems = dataCateg.total;

      console.log(this.categories, this.itemsPerPage, this.totalItems);
    });
  }

  onePageChange(numberPage: number) {
    this.currentPage = numberPage;
    this.getCateg(numberPage);
  }

  addCateg() {
    const cate = {
      libelle: this.lib,
    };
    this.categService.addCateg(cate).subscribe((response: any) => {
      this.exist = response.data.length == 0;
      this.lib = ""
    });
  }

  searchCateg() {
    const tab1: any = this.categories;
    let libel = false;
    tab1.forEach((element: { libelle: string }) => {
      if (element.libelle == this.lib) {
        libel = true;
      }
    });
    this.libExist = libel;

  }

  tab: number[] = [];

  cocheCateg(idCateg: number, event: Event) {

    

    if ('checked' in event.target!) {
      if (event.target.checked == true) {
        this.tab.push(idCateg)
        //  console.log(this.tab);
        if (this.categories.length == this.tab.length) {
          this.checkAll.nativeElement.checked = true
        } else {
          this.checkAll.nativeElement.checked = false
        }

      } else {
        let index = this.tab.indexOf(idCateg)
        this.tab.splice(index, 1);
        this.checkAll.nativeElement.checked = false
      }

    }
    if (this.tab.length == 0) {
      this.delete = true;
    }
    else {
      this.delete = false;
    }
  }
  selectAll(event: Event) {
    let element = event.target as HTMLInputElement;

    if (element?.checked) {
      this.delete = false
   
      const checkCateg=this.categories?.filter(idCateg => {idCateg.checked
      this.checkOne == false} )
      console.log(this.categories);
      
    }
    else {
      this.delete = true
    }
    
  }

  deleteCateg() {
    this.categService.deleteCateg(this.tab[0]).subscribe((response) => {
      this.getCateg(this.currentPage);
    });
  }

  clickCateg(lib: any) {
    this.lib = lib;
    console.log(lib);
  }

  modifCateg(idC: any) {
    // this.delete=false;
    this.categService.modifCateg(idC).subscribe((response) => {
      console.log(response);
    });
  }

  // check() {

  // }


}
  // modifAjout(){

//   // }


/*--------------- pour savoir si ça existe-------------------- */

// this.exist = response.data.length == 0 ? true : false;

// if (response.data.length == 0) {
//   this.exist = true;
// } else {
//   this.exist = false;
// }
