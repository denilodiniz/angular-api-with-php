import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators'; //Map será utilizado para percorrer e listar todos os objetos do DB
import { Course } from './course';

@Injectable({
  providedIn: 'root'
})
export class CourseService {

  baseUrl = "http://localhost:8080/angular-api/backend/";

  courses: Course[] = [];

  constructor(
    private http: HttpClient
  ) { }

  getAllCourses(): Observable<Course[]> {
    return this.http.get(this.baseUrl + 'getAllCourses.php')
    .pipe(map((response: any) => {
      this.courses = response['courses'];
      return this.courses;
    }));
  }

  registerCourse(course: Course): Observable<Course[]> {
    return this.http.post(this.baseUrl + 'createCourse', {courses: course})
    .pipe(map((response: any) => {
      this.courses.push(response['courses']);
      return this.courses;
    }));
  }

  deleteCourse(course: Course): Observable<Course[]> {

    const params = new HttpParams().set("idCourse", course.id!.toString());

    return this.http.delete(this.baseUrl + 'deleteCourse.php', {params: params})
      .pipe(map((response) => {
        const filtro = this.courses.filter((course) => {
          return + course['id']! !== + course.id!;
        });
      return this.courses = filtro;
    }));
  }

  updateCourse(course: Course): Observable<Course[]> {
    return this.http.put(this.baseUrl + 'updateCourse.php', {courses: course})
      .pipe(map(() => {
        const updateCourse = this.courses.find((item) => {
          return +item['id']! === +['id'];
        });

        if (updateCourse) {
          updateCourse['name'] = course['name'];
          updateCourse['value'] = course['value'];
        }

        return this.courses;

      }));

  }
}
