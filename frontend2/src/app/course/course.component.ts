import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Course } from './course';
import { CourseService } from './course.service';

@Component({
  selector: 'app-course',
  templateUrl: './course.component.html',
  styleUrls: ['./course.component.css']
})
export class CourseComponent implements OnInit {

  baseUrl = "http://localhost:8080/angular-api/backend/";

  courses: Course[] = [];

  course = new Course();

  constructor(
    private http: HttpClient, //Import HttpClientModule in app.modules.ts
    private courseService: CourseService
  ) { }

  ngOnInit(): void {
    this.courseView();
  }
  
  courseRegister(course: Course) {
    this.courseService.registerCourse(course).subscribe(
      (response: Course[]) => {
        this.courses = response;
        this.course.name = "";
        this.course.value = 0;
      }
    )
  }

  courseUpdate(course: Course) {
    this.courseService.updateCourse(course).subscribe(
      (response: any) => {
        this.courses = response; //atualizando o vetor com os cursos 

        //Limpando os valores do objeto
        this.course.name = "";
        this.course.value = 0;

        //Atualiza a listagem dos cursos
        this.courseView();
      }
    );
  }

  courseView() {
    this.courseService.getAllCourses().subscribe(
      (response: Course[]) => {
        this.courses = response
      }
    );
  }

  courseDelete(course: Course) {
    this.courseService.deleteCourse(course).subscribe(
      (response : Course[]) => {
        this.courses = response;
        this.course.name = "";
        this.course.value = 0;
      }
    );
  }

  selectCourse(course: Course) {
    this.course.id = course.id;
    this.course.name = course.name;
    this.course.value = course.value;
  }

}
